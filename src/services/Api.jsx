// filepath: /c:/Users/User/AppData/Roaming/Python/Python313/Scripts/team_project/src/App.js
import axios from 'axios';

// Create an instance of axios with default settings
const api = axios.create({
  baseURL: 'http://localhost:5000' // Replace with your back-end API URL
});

// Define API call functions
export const login = (credentials) => api.post('/login', credentials);
export const register = (userData) => api.post('/register', userData);
export const getCourses = () => api.get('/courses');
export const getCourseContent = (id) => api.get(`/course/${id}`);
export const getQuiz = (id) => api.get(`/quiz/${id}`);
export const submitQuiz = (id, answers) => api.post(`/quiz/${id}/submit`, { answers });
export const getProfile = () => api.get('/profile');
export const updateProfile = (profileData) => api.put('/profile', profileData);
export const getThreads = () => api.get('/threads');
export const createThread = (threadData) => api.post('/threads', threadData);