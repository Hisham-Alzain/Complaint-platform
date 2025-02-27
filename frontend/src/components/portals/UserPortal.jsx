import React, { useState } from 'react';
import ComplaintCard from './ComplaintCard';
import styles from '../css/UserPortal.module.css'; // Import CSS module

const UserPortal = () => {
    const [complaints, setComplaints] = useState([]);
    const [newComplaint, setNewComplaint] = useState({
        title: '',
        description: '',
        category: 'infrastructure'
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        setComplaints([...complaints, {
            ...newComplaint,
            id: Date.now(),
            status: 'Pending',
            date: new Date().toLocaleDateString()
        }]);
        setNewComplaint({ title: '', description: '', category: 'infrastructure' });
    };

    return (
        <div className={`${styles.portal} ${styles.userPortal}`}>
            <h2>Citizen Complaint Portal</h2>

            <div className={styles.portalContent}>
                {/* Complaint Submission Form */}
                <form onSubmit={handleSubmit} className={styles.complaintForm}>
                    <h3>Submit New Complaint</h3>
                    <div className={styles.formGroup}>
                        <label>Title:</label>
                        <input
                            type="text"
                            value={newComplaint.title}
                            onChange={(e) => setNewComplaint({ ...newComplaint, title: e.target.value })}
                            required
                        />
                    </div>

                    <div className={styles.formGroup}>
                        <label>Category:</label>
                        <select
                            value={newComplaint.category}
                            onChange={(e) => setNewComplaint({ ...newComplaint, category: e.target.value })}
                        >
                            <option value="infrastructure">Infrastructure</option>
                            <option value="health">Health</option>
                            <option value="education">Education</option>
                        </select>
                    </div>

                    <div className={styles.formGroup}>
                        <label>Description:</label>
                        <textarea
                            value={newComplaint.description}
                            onChange={(e) => setNewComplaint({ ...newComplaint, description: e.target.value })}
                            required
                        />
                    </div>

                    <button type="submit">Submit Complaint</button>
                </form>

                {/* Existing Complaints */}
                <div className={styles.complaintsList}>
                    <h3>Your Complaints</h3>
                    {complaints.map(complaint => (
                        <ComplaintCard
                            key={complaint.id}
                            complaint={complaint}
                            isOfficial={false}
                        />
                    ))}
                </div>
            </div>
        </div>
    );
};

export default UserPortal;