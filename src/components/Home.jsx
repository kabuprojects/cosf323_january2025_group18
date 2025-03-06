import React from 'react';
import { Link } from 'react-router-dom';
import cyberSecureImage from '../assets/images/cyber-secure.jpg'; // Import the image

function Home() {
  return (
    <div className="home-container">
      <header className="fixed-header">
        <h1>Cybersecurity Platform</h1>
        <div className="button-container">
          <Link className="btn btn-primary mr-2" to="/login">Login</Link>
          <Link className="btn btn-secondary" to="/register">Register</Link>
        </div>
        <p>Welcome to the Cybersecurity Platform. This platform is designed to help you learn about cybersecurity through interactive lessons and quizzes.</p>
        <p>Fact: Cybersecurity is essential in today's digital world to protect sensitive information from cyber threats.</p>
        <p>Fact: The global cybersecurity market is expected to grow to $248.26 billion by 2023.</p>
      </header>
      <div className="image-container">
        <img src={cyberSecureImage} alt="Welcome" className="img-fluid full-width-image" />
      </div>
      <footer>
        <p>&copy; 2025 Cybersecurity Platform. All rights reserved.</p>
      </footer>
    </div>
  );
}

export default Home;