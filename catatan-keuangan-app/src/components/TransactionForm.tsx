import React, { useState } from 'react';

const TransactionForm: React.FC<{ onAddTransaction: (transaction: { title: string; amount: number; date: string }) => void }> = ({ onAddTransaction }) => {
    const [title, setTitle] = useState('');
    const [amount, setAmount] = useState<number | ''>('');
    const [date, setDate] = useState('');

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        if (title && amount && date) {
            onAddTransaction({ title, amount: Number(amount), date });
            setTitle('');
            setAmount('');
            setDate('');
        }
    };

    return (
        <form onSubmit={handleSubmit}>
            <div>
                <label htmlFor="title">Title</label>
                <input
                    type="text"
                    id="title"
                    value={title}
                    onChange={(e) => setTitle(e.target.value)}
                    required
                />
            </div>
            <div>
                <label htmlFor="amount">Amount</label>
                <input
                    type="number"
                    id="amount"
                    value={amount}
                    onChange={(e) => setAmount(e.target.value)}
                    required
                />
            </div>
            <div>
                <label htmlFor="date">Date</label>
                <input
                    type="date"
                    id="date"
                    value={date}
                    onChange={(e) => setDate(e.target.value)}
                    required
                />
            </div>
            <button type="submit">Add Transaction</button>
        </form>
    );
};

export default TransactionForm;