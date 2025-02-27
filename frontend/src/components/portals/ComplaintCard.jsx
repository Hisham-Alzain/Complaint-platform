import React from 'react';
import styles from '../css/ComplaintCard.module.css';

const ComplaintCard = ({ complaint, isOfficial, onRespond }) => {
    return (
        <div className={`${styles.complaintCard} ${styles[complaint.status.toLowerCase()]}`}>
            <div className={styles.cardHeader}>
                <h4>{complaint.title}</h4>
                <span className={`${styles.statusBadge} ${styles[complaint.status.toLowerCase()]}`}>
                    {complaint.status}
                </span>
            </div>
            <div className={styles.cardBody}>
                <p>{complaint.description}</p>
                <div className={styles.metaInfo}>
                    <span>Category: {complaint.category}</span>
                    <span>Date: {complaint.date}</span>
                </div>
            </div>
            {isOfficial && (
                <div className={styles.cardActions}>
                    <button onClick={onRespond}>Respond</button>
                </div>
            )}
        </div>
    );
};

export default ComplaintCard;