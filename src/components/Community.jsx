import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';

function Community() {
  const [threads, setThreads] = useState([]);
  const [newThreadTitle, setNewThreadTitle] = useState('');
  const [newThreadContent, setNewThreadContent] = useState('');

  useEffect(() => {
    const fetchThreads = async () => {
      try {
        const response = await axios.get('http://localhost:5000/threads');
        setThreads(response.data);
      } catch (error) {
        console.error('Error fetching threads:', error);
      }
    };

    fetchThreads();
  }, []);

  const handleCreateThread = async (e) => {
    e.preventDefault();
    try {
      const response = await axios.post('http://localhost:5000/threads', {
        title: newThreadTitle,
        content: newThreadContent,
      });
      setThreads([...threads, response.data]);
      setNewThreadTitle('');
      setNewThreadContent('');
    } catch (error) {
      console.error('Error creating thread:', error);
    }
  };

  return (
    <div className="community-container">
      <header className="fixed-header">
        <h1>Community</h1>
        <div className="button-container">
          <Link className="btn btn-primary mr-2" to="/dashboard">Dashboard</Link>
        </div>
        <p>Welcome to the Community page. Here you can interact with other members and share knowledge.</p>
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
      <main>
        <div className="container mt-5">
          <h1>Community Forum</h1>
          <form onSubmit={handleCreateThread}>
            <div className="form-group">
              <input
                type="text"
                className="form-control"
                value={newThreadTitle}
                onChange={(e) => setNewThreadTitle(e.target.value)}
                placeholder="Thread Title"
                required
              />
            </div>
            <div className="form-group">
              <textarea
                className="form-control"
                value={newThreadContent}
                onChange={(e) => setNewThreadContent(e.target.value)}
                placeholder="Thread Content"
                rows="5"
                required
              ></textarea>
            </div>
            <button type="submit" className="btn btn-primary">Create Thread</button>
          </form>
          <div className="mt-5">
            <h2>Discussion Threads</h2>
            {threads.map((thread) => (
              <div key={thread._id} className="card mb-3">
                <div className="card-body">
                  <h5 className="card-title">{thread.title}</h5>
                  <p className="card-text">{thread.content}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </main>
      <footer>
        <p>&copy; 2025 Cybersecurity Platform. All rights reserved.</p>
      </footer>
    </div>
  );
}

export default Community;