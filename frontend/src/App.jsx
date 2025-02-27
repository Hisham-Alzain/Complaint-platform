import React from 'react';
import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';
import UserPortal from './components/portals/UserPortal';
import OfficialPortal from './components/portals/OfficialPortal';

export default function App() {
  return (
    <Router>
      <nav>
        <Link to="/user">Citizen Portal</Link>
        <Link to="/official">Official Portal</Link>
      </nav>

      <Routes>
        <Route path="/user" element={<UserPortal />} />
        <Route path="/official" element={<OfficialPortal />} />
      </Routes>
    </Router>
  );
}