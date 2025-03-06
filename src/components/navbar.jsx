import React from 'react';
import { Link } from 'react-router-dom';
import { useTranslation } from 'react-i18next';

function NavBar({ handleLogout }) {
  const { t } = useTranslation();

  return (
    <div className="sidebar">
      <nav className="navbar navbar-expand-lg navbar-light bg-light">
        <div className="collapse navbar-collapse" id="navbarNav">
          <ul className="navbar-nav mr-auto">
            <li className="nav-item">
              <Link className="btn btn-primary nav-link" to="/dashboard">{t('Dashboard')}</Link>
            </li>
            <li className="nav-item">
              <Link className="btn btn-primary nav-link" to="/quizzes">{t('Quizzes')}</Link>
            </li>
            <li className="nav-item">
              <Link className="btn btn-primary nav-link" to="/coursecontent/1">{t('Course Content')}</Link> {/* Example link to course with ID 1 */}
            </li>
            <li className="nav-item">
              <Link className="btn btn-primary nav-link" to="/profile">{t('Profile')}</Link>
            </li>
            <li className="nav-item">
              <Link className="btn btn-primary nav-link" to="/community">{t('Community')}</Link>
            </li>
            <li className="nav-item">
              <button className="btn btn-secondary nav-link" onClick={handleLogout}>{t('Logout')}</button>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  );
}

export default NavBar;