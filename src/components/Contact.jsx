import React from 'react';
import { Link } from 'react-router-dom';

const Contact = () => (
  <div className="contact-container">
    <header className="fixed-header">
      <h1>Contact Us</h1>
      <div className="button-container">
        <Link className="btn btn-primary mr-2" to="/dashboard">Dashboard</Link>
      </div>
      <p>Feel free to reach out to us with any questions or concerns.</p>
    </header>
    <aside className="sidebar">
      <nav>
        <Link to="/dashboard">Dashboard</Link>
        <Link to="/quizzes">Quizzes</Link>
        <Link to="/courses">Courses</Link>
        <Link to="/profile">Profile</Link>
        <Link to="/community">Community</Link>
        <Link to="/contact">Contact</Link>
      </nav>
    </aside>
    <div className="whitish-region">
      <h2>Contact Us</h2>
      <form>
        <div className="form-group">
          <label htmlFor="name">Name</label>
          <input type="text" className="form-control" id="name" placeholder="Enter your name" />
        </div>
        <div className="form-group">
          <label htmlFor="email">Email address</label>
          <input type="email" className="form-control" id="email" placeholder="Enter your email" />
        </div>
        <div className="form-group">
          <label htmlFor="message">Message</label>
          <textarea className="form-control" id="message" rows="3"></textarea>
        </div>
        <button type="submit" className="btn btn-primary">Submit</button>
      </form>
    </div>
    <footer>
      <p>&copy; 2025 Cybersecurity Platform. All rights reserved.</p>
    </footer>
  </div>
);

export default Contact;