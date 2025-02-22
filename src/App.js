import React, { useState, useEffect } from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Navbar from './components/Navbar.js';
import Footer from './components/Footer.js';
import Home from './pages/Home.js';
import BrowseCourses from './pages/Browse-Courses.js';
import LoginForm from './components/LoginForm.js';
import './App.css';

function App() {
  const [isAuthenticated, setIsAuthenticated] = useState(false);

  useEffect(() => {
    // Check if the user is authenticated
    const email = localStorage.getItem('email');
    const password = localStorage.getItem('password');
    if (email && password) {
      setIsAuthenticated(true);
    }
  }, []);

  return (
    <Router>
      <div className="App">
        {isAuthenticated && (
          <header className="App-header">
            <Navbar />
          </header>
        )}
        <Routes>
          <Route path="/" element={<Home />}/>
          <Route path="/browse-courses" element={<BrowseCourses />}/>
          <Route path="/login" element={<LoginForm setIsAuthenticated={setIsAuthenticated} />} />
          <Route path="/auth" element={<LoginForm setIsAuthenticated={setIsAuthenticated} />} />
        </Routes>
        {isAuthenticated && <Footer />}
      </div>
    </Router>
  );
}

export default App;