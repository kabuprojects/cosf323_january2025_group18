import React, { useState, useEffect } from 'react';
import axios from 'axios';

function Profile() {
  const [user, setUser] = useState({});
  const [editMode, setEditMode] = useState(false);
  const [newPassword, setNewPassword] = useState('');
  const [activity, setActivity] = useState([]);
  const [profileImage, setProfileImage] = useState('/src/assets/images/profile.jpg');

  useEffect(() => {
    const fetchUser = async () => {
      try {
        const response = await axios.get('http://localhost:5000/user');
        setUser(response.data);
      } catch (error) {
        console.error('Error fetching user:', error);
      }
    };

    const fetchActivity = async () => {
      try {
        const response = await axios.get('http://localhost:5000/user/activity');
        setActivity(response.data);
      } catch (error) {
        console.error('Error fetching activity:', error);
      }
    };

    fetchUser();
    fetchActivity();
  }, []);

  const handleEditProfile = async (e) => {
    e.preventDefault();
    try {
      const response = await axios.put('http://localhost:5000/user', user);
      setUser(response.data);
      setEditMode(false);
    } catch (error) {
      console.error('Error updating profile:', error);
    }
  };

  const handleChangePassword = async (e) => {
    e.preventDefault();
    try {
      await axios.put('http://localhost:5000/user/password', { password: newPassword });
      setNewPassword('');
    } catch (error) {
      console.error('Error changing password:', error);
    }
  };

  const handleImageUpload = (e) => {
    const file = e.target.files[0];
    const reader = new FileReader();
    reader.onloadend = () => {
      setProfileImage(reader.result);
    };
    if (file) {
      reader.readAsDataURL(file);
    }
  };

  return (
    <div className="profile-container">
      <header className="fixed-header">
        <h1>Profile</h1>
        <p>Manage your profile information and settings.</p>
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
        <div className="container mt-5">
          <h2>Profile Details</h2>
          {editMode ? (
            <form onSubmit={handleEditProfile}>
              <div className="form-group">
                <label>Name</label>
                <input
                  type="text"
                  className="form-control"
                  value={user.name}
                  onChange={(e) => setUser({ ...user, name: e.target.value })}
                  required
                />
              </div>
              <div className="form-group">
                <label>Email</label>
                <input
                  type="email"
                  className="form-control"
                  value={user.email}
                  onChange={(e) => setUser({ ...user, email: e.target.value })}
                  required
                />
              </div>
              <div className="form-group">
                <label>Profile Image</label>
                <input
                  type="file"
                  className="form-control"
                  onChange={handleImageUpload}
                />
              </div>
              <button type="submit" className="btn btn-primary">Save Changes</button>
              <button type="button" className="btn btn-secondary" onClick={() => setEditMode(false)}>Cancel</button>
            </form>
          ) : (
            <div>
              {profileImage && <img src={profileImage} alt="Profile" className="profile-image" />}
              <p><strong>Name:</strong> {user.name}</p>
              <p><strong>Email:</strong> {user.email}</p>
              <button className="btn btn-primary" onClick={() => setEditMode(true)}>Edit Profile</button>
            </div>
          )}
          <h2>Change Password</h2>
          <form onSubmit={handleChangePassword}>
            <div className="form-group">
              <label>New Password</label>
              <input
                type="password"
                className="form-control"
                value={newPassword}
                onChange={(e) => setNewPassword(e.target.value)}
                required
              />
            </div>
            <button type="submit" className="btn btn-primary">Change Password</button>
          </form>
          <h2>Activity</h2>
          <ul>
            {activity.map((item, index) => (
              <li key={index}>{item}</li>
            ))}
          </ul>
        </div>
      </main>
      <footer>
        <p>&copy; 2025 Cybersecurity Platform. All rights reserved.</p>
      </footer>
    </div>
  );
}

export default Profile;