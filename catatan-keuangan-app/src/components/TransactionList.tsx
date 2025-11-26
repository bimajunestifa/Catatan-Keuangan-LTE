import React from 'react';
import { Transaction } from '../types';
import './TransactionList.css';

interface TransactionListProps {
    transactions: Transaction[];
}

const TransactionList: React.FC<TransactionListProps> = ({ transactions }) => {
    return (
        <div className="transaction-list">
            <h2>Daftar Transaksi</h2>
            {transactions.length === 0 ? (
                <p>Tidak ada transaksi yang tersedia.</p>
            ) : (
                <ul>
                    {transactions.map((transaction) => (
                        <li key={transaction.id}>
                            <span>{transaction.date}</span>
                            <span>{transaction.description}</span>
                            <span>{transaction.amount}</span>
                        </li>
                    ))}
                </ul>
            )}
        </div>
    );
};

export default TransactionList;