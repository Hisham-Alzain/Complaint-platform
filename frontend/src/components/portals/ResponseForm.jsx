import React, { useState } from 'react';
import styles from '../css/ResponseForm.module.css';

const ResponseForm = ({ complaint, onSubmit, onClose }) => {
    const [response, setResponse] = useState('');

    const handleSubmit = (e) => {
        e.preventDefault();
        onSubmit({
            complaintId: complaint.id,
            response,
            status: 'Resolved'
        });
    };

    return (
        <div className={styles.responseModal}>
            <div className={styles.modalContent}>
                <h3>Respond to: {complaint.title}</h3>
                <form onSubmit={handleSubmit}>
                    <div className={styles.formGroup}>
                        <label>Official Response:</label>
                        <textarea
                            value={response}
                            onChange={(e) => setResponse(e.target.value)}
                            required
                        />
                    </div>
                    <div className={styles.formActions}>
                        <button type="button" onClick={onClose}>Cancel</button>
                        <button type="submit">Submit Response</button>
                    </div>
                </form>
            </div>
        </div>
    );
};

export default ResponseForm;