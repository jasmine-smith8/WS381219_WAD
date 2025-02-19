import React, { useContext } from 'react';
import { Link } from 'react-router-dom';
import './Navbar.css';
import { handleLogout } from '../pages/Logout.js';


function Navbar() {

  return (
    <nav className="navbar">
      <div className="container">
            <Link className="navbar-brand" to="/">
            <h1>HateHire</h1>
            </Link>
          <div className="search-container">
            <form className="search" role="search">
              <input
                className="search-input"
                type="search"
                placeholder="Search For A Course..."
                aria-label="Search"
              />
              <button className="search-button" type="submit">
                <img
                  src="https://img.icons8.com/ios-glyphs/30/000000/search--v1.png"
                  alt="Search"
                  height="20px"
                  width="20px"
                />
              </button>
            </form>
          </div>
          <ul className="navbar-links">
            <li className="nav-item">
              <Link className="nav-link" to="/browse-courses">
                Browse Courses
              </Link>
            </li>
                <li className="nav-item">
                  <Link className="nav-link" to="/course-history">
                    Course History
                  </Link>
                </li>
                <li className="nav-item">
                <button className="nav-link btn btn-link" onClick={handleLogout}>
                    Logout
                </button>
            </li>
          </ul>
        </div>
    </nav>
  );
}

export default Navbar;