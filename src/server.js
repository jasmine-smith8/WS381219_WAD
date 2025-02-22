import express from 'express';
import bodyParser from 'body-parser';
import mysql from 'mysql2/promise';
import bcrypt from 'bcryptjs';
import dotenv from 'dotenv';
import cors from 'cors';

dotenv.config();

const app = express();
const port = process.env.PORT || 3000;

app.use(bodyParser.json());
app.use(cors());

// Create a MySQL connection pool
const pool = mysql.createPool({
  host: process.env.DB_SERVER,
  user: process.env.DB_USERNAME,
  password: process.env.DB_PASSWORD,
  database: process.env.DB_DATABASE
});

app.post('/backend/php/auth.php', async (req, res) => {
  const { email, password } = req.body;

  if (!email || !password) {
    return res.status(400).json({ status: 'error', message: 'Missing POST data' });
  }

  try {
    const [rows] = await pool.query('SELECT * FROM `users` WHERE `email` = ?', [email]);

    if (rows.length === 1) {
      const user = rows[0];

      const passwordMatch = await bcrypt.compare(password, user.password);
      if (passwordMatch) {
        req.session.userID = user.userID;
        return res.status(200).json({ status: 'success' });
      } else {
        return res.status(401).json({ status: 'error', message: 'Invalid password' });
      }
    } else {
      return res.status(404).json({ status: 'error', message: 'User not found' });
    }
  } catch (error) {
    console.error(error);
    return res.status(500).json({ status: 'error', message: 'Internal server error' });
  }
});

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});