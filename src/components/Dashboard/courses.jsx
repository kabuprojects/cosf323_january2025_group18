import React, { useState, useEffect } from 'react';
import { Link, useHistory } from 'react-router-dom';
import axios from 'axios';

function Courses() {
  const [courses, setCourses] = useState([]);
  const [selectedCourseId, setSelectedCourseId] = useState('');
  const history = useHistory();

  useEffect(() => {
    axios.get('/api/courses')
      .then(response => {
        const cybersecurityCourses = response.data.filter(course => course.category === 'Cybersecurity').slice(0, 6);
        console.log('Fetched Courses:', cybersecurityCourses);
        setCourses(cybersecurityCourses);
      })
      .catch(error => {
        console.error('Error fetching courses:', error);
      });
  }, []);

  const handleSelectCourse = (event) => {
    setSelectedCourseId(event.target.value);
  };

  const handleSaveCourse = () => {
    if (selectedCourseId) {
      const selectedCourse = courses.find(course => course.id === selectedCourseId);
      console.log('Selected Course:', selectedCourse);
      history.push({
        pathname: `/coursecontent/${selectedCourseId}`,
        state: { course: selectedCourse }
      });
    } else {
      alert('Please select a course first.');
    }
  };

  return (
    <div className="courses-container">
      <header className="fixed-header">
        <h1>Courses</h1>
        <div className="button-container">
          <Link className="btn btn-primary mr-2" to="/dashboard">Dashboard</Link>
        </div>
        <p>Welcome to the Courses page. Here you can select and enroll in various cybersecurity courses.</p>
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
        <h2>Select a Course</h2>
        <p>Choose from the list of available courses below to start learning:</p>
        <select onChange={handleSelectCourse} className="course-select" value={selectedCourseId}>
          <option value="">Select a course</option>
          {courses.map((course) => (
            <option key={course.id} value={course.id}>
              {course.name}
            </option>
          ))}
          <option value="network-security">Network Security</option>
          <option value="application-security">Application Security</option>
          <option value="cloud-security">Cloud Security</option>
          <option value="incident-response">Incident Response</option>
          <option value="penetration-testing">Penetration Testing</option>
        </select>
        <button className="btn btn-primary save-button" onClick={handleSaveCourse}>
          Save and Continue
        </button>
      </div>
      <footer>
        <p>&copy; 2025 Cybersecurity Platform. All rights reserved.</p>
      </footer>
    </div>
  );
}

export default Courses;