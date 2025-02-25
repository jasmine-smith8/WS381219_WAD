import React, { useState, useEffect } from 'react';
import { BrowserRouter as Router, Route, Routes, Navigate } from 'react-router-dom';
import Footer from './components/Footer.js';
import Home from './pages/Home.js';
import BrowseCourses from './pages/Browse-Courses.js';
import LoginForm from './components/LoginForm.js';
import Navbar from './components/Navbar.js';
import UserDashboard from './pages/User-Dashboard.js';
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
          <Route path="/" element={isAuthenticated ? <Home /> : <Navigate to="/login" />} />
          <Route path="/browse-courses" element={isAuthenticated ? <BrowseCourses /> : <Navigate to="/login" />} />
          <Route path="/user-dashboard" element={isAuthenticated ? <UserDashboard /> : <Navigate to="/user-dashboard" />} />
          <Route path="/login" element={<LoginForm setIsAuthenticated={setIsAuthenticated} />} />
        </Routes>
        {isAuthenticated && <Footer />}
      </div>
    </Router>
  );
}

export default App;