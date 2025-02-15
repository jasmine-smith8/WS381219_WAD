import React, { useContext } from 'react';
import { Link } from 'react-router-dom';
import './Navbar.css';

function Navbar() {

  return (
    <nav className="navbar navbar-expand-lg">
      <div className="container-fluid">
        <div className="d-flex align-items-center ms-auto">
            <Link className="navbar-brand" to="/">
            <h1>HateHire</h1>
            </Link>
          <div className="search-container d-flex">
            <form className="d-flex" role="search">
              <input
                className="form-control me-2"
                type="search"
                placeholder="Search For A Course..."
                aria-label="Search"
              />
              <button className="btn btn-outline-danger" type="submit">
                <img
                  src="https://img.icons8.com/ios-glyphs/30/000000/search--v1.png"
                  alt="Search"
                  height="15px"
                  width="15px"
                />
              </button>
            </form>
          </div>
          <ul className="navbar-nav ms-3">
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
                  <Link className="nav-link" to="/logout">
                    Logout
                  </Link>
                </li>
          </ul>
        </div>
      </div>
    </nav>
  );
}

export default Navbar;