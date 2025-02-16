import React from 'react';
import { BrowserRouter as Router, Route, Routes, Navigate } from 'react-router-dom';
import Navbar from './components/Navbar.js';
import Footer from './components/Footer.js';
import Home from './pages/Home';
import BrowseCourses from './pages/Browse-Courses';
import Logout from './pages/Logout';
import Login from './pages/Login';
import './App.css';
import { AuthProvider, useAuth } from './AuthContext';

const PrivateRoute = ({ element }) => {
  const { isAuthenticated } = useAuth();
  return isAuthenticated ? element : <Navigate to="/login" />;
};
  
function App() {
  const { isAuthenticated } = useAuth();
  return (
  <AuthProvider>
    <Router>
      <div className="App">
      {isAuthenticated && (
        <header className="App-header">
          <Navbar />
        </header>
      )}
        <Routes>
          <Route path="/" element={<PrivateRoute element={<Home />} />} />
          <Route path="/browse-courses" element={<PrivateRoute element={<BrowseCourses />} />} />
          <Route path="/logout" element={<PrivateRoute element={<Logout />} />} />
          <Route path="/login" element={<Login />} />
        </Routes>
        {isAuthenticated && <Footer />}
      </div>
    </Router>
    </AuthProvider>
  );
}

export default App;