import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';

function Dashboard() {
  const [showDetails, setShowDetails] = useState(false);
  const [userDetails, setUserDetails] = useState(null);

  const handleShowDetails = () => {
    setShowDetails(true);
  };

  useEffect(() => {
    if (showDetails) {
      // Fetch user details from the backend
      axios.get('/api/user/details')
        .then(response => {
          setUserDetails(response.data);
        })
        .catch(error => {
          console.error('There was an error fetching the user details!', error);
        });
    }
  }, [showDetails]);

  const getCurrentDate = () => {
    const date = new Date();
    return date.toDateString();
  };

  return (
    <div className="dashboard-container">
      <header className="fixed-header">
        <h1>Dashboard</h1>
        <div className="button-container">
          <Link className="btn btn-primary mr-2" to="/courses">Courses</Link>
        </div>
        <p>Welcome to your dashboard. Here you can track your progress and access your courses.</p>
      </header>
      <aside className="sidebar">
        <nav>
          <Link to="/dashboard">Dashboard</Link>
          <Link to="/quizzes">Quizzes</Link>
          <Link to="/courses">Courses</Link>
          <Link to="/profile">Profile</Link>
          <Link to="/community">Community</Link>
        </nav>
      </aside>
      <div className="whitish-region">
        <button className="btn btn-secondary" onClick={handleShowDetails}>Show Details</button>
        {showDetails && userDetails ? (
          <div className="user-details">
            <h2>User Progress</h2>
            <p><strong>Date:</strong> {getCurrentDate()}</p>
            <p><strong>Username:</strong> {userDetails.username}</p>
            <p><strong>Day of Entry:</strong> {new Date(userDetails.entryDate).toDateString()}</p>
            <p><strong>Interactions:</strong> {userDetails.interactions}</p>
            <p><strong>Lessons Done:</strong> {userDetails.lessonsDone}</p>
            <p><strong>Quizzes Attempted:</strong> {userDetails.quizzesAttempted}</p>
            <p><strong>Categories Selected:</strong> {userDetails.categories.join(', ')}</p>
            <p><strong>Grades:</strong> {userDetails.grades}</p>
            <p><strong>Advice:</strong> {userDetails.advice}</p>
            {userDetails.courses.map((course, index) => (
              <p key={index} style={{ color: course.statusColor }}>
                {course.name}: {course.status}
              </p>
            ))}
          </div>
        ) : (
          showDetails && <p className="no-details">No details available at the moment.</p>
        )}
      </div>
      <footer>
        <p>&copy; 2025 Cybersecurity Platform. All rights reserved.</p>
      </footer>
    </div>
  );
}

export default Dashboard;