import React from 'react';
import { useLocation, useHistory } from 'react-router-dom';

function CourseContent() {
  const location = useLocation();
  const history = useHistory();
  const { course } = location.state || {};

  const lessons = [
    'Introduction',
    'Lesson 1: Basics',
    'Lesson 2: Intermediate',
    'Lesson 3: Advanced',
    'Conclusion'
  ];

  const handleLessonClick = (lesson) => {
    history.push(`/lesson/${lesson}`);
  };

  return (
    <div className="course-content-container">
      <header className="fixed-header">
        <h1>{course ? course.name : 'Course Content'}</h1>
        {course && <p>{course.description}</p>}
      </header>
      <aside className="sidebar">
        <nav>
          <a href="/dashboard">Dashboard</a>
          <a href="/quizzes">Quizzes</a>
          <a href="/courses">Courses</a>
          <a href="/profile">Profile</a>
          <a href="/community">Community</a>
        </nav>
      </aside>
      <main>
        {course ? (
          <div className="lesson-schedule">
            {lessons.map((lesson, index) => (
              <div key={index} className="lesson-container">
                <h3>{lesson}</h3>
                <button className="btn btn-primary" onClick={() => handleLessonClick(lesson)}>
                  Go to Lesson
                </button>
              </div>
            ))}
          </div>
        ) : (
          <div className="error-message">Error: Course not found</div>
        )}
      </main>
      <footer>
        <p>&copy; 2025 Cybersecurity Platform. All rights reserved.</p>
      </footer>
    </div>
  );
}

export default CourseContent;