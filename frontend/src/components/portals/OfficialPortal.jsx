import React, { useState } from 'react';
import ComplaintCard from './ComplaintCard';
import ResponseForm from './ResponseForm';
import styles from '../css/OfficialPortal.module.css'; // Import CSS module

const OfficialPortal = () => {
    const [selectedComplaint, setSelectedComplaint] = useState(null);
    const [complaints] = useState([
        // Mock data
        {
            id: 1,
            title: "Pothole Repair",
            description: "Large pothole on Main Street",
            category: "infrastructure",
            status: "Pending",
            date: "2023-08-15"
        }
    ]);

    const handleResponseSubmit = (response) => {
        // Handle response submission logic
        console.log("Response submitted:", response);
        setSelectedComplaint(null);
    };

    return (
        <div className={`${styles.portal} ${styles.officialPortal}`}>
            <h2>Official Response Portal</h2>
            <div className={styles.portalHeader}>
                <div className={styles.stats}>
                    <span>Pending: 5</span>
                    <span>Resolved: 12</span>
                </div>
            </div>

            <div className={styles.complaintsList}>
                {complaints.map(complaint => (
                    <ComplaintCard
                        key={complaint.id}
                        complaint={complaint}
                        isOfficial={true}
                        onRespond={() => setSelectedComplaint(complaint)}
                    />
                ))}
            </div>

            {selectedComplaint && (
                <ResponseForm
                    complaint={selectedComplaint}
                    onSubmit={handleResponseSubmit}
                    onClose={() => setSelectedComplaint(null)}
                />
            )}
        </div>
    );
};

export default OfficialPortal;