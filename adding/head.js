// Header.js
import React from 'react';
import './header.css';
import { Link } from 'react-router-dom'

function Header() {
  return (
    <div className='header'>
      <div className='header__center'>
        <ul className='header__lists'>
          <li><Link to="/">Exam Registration</Link></li>
          <li><Link to="/technopedia">Home Page</Link></li>
          <li><Link to="/pyp">Logout</Link></li>
        </ul>
      </div>
    </div>
  );
}

export default Header;
