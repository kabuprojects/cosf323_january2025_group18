import React, { useState } from 'react';
import { useHistory, Link } from 'react-router-dom';

function Login({ onLogin }) {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const history = useHistory();

  const handleSubmit = (e) => {
    e.preventDefault();
    onLogin(email, password);
    history.push('/dashboard');
  };

  return (
    <div className="login-container">
      <header className="fixed-header">
        <h1>Login to Cybersecurity Platform</h1>
        <p>Please enter your email and password to log in.</p>
        <div className="form-container">
          <form onSubmit={handleSubmit}>
            <div className="form-group">
              <label htmlFor="email">Email:</label>
              <input
                type="email"
                id="email"
                className="form-control"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
                required
              />
            </div>
            <div className="form-group">
              <label htmlFor="password">Password:</label>
              <input
                type="password"
                id="password"
                className="form-control"
                value={password}
                onChange={(e) => setPassword(e.target.value)}
                required
              />
            </div>
            <button type="submit" className="btn btn-primary">Login</button>
          </form>
        </div>
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
      <footer>
        <p>&copy; 2025 Cybersecurity Platform. All rights reserved.</p>
      </footer>
    </div>
  );
}

export default Login;