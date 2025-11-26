import { useState, useEffect } from 'react';
import { Transaction } from '../types';

const useTransactions = () => {
    const [transactions, setTransactions] = useState<Transaction[]>([]);
    const [loading, setLoading] = useState<boolean>(true);
    const [error, setError] = useState<string | null>(null);

    useEffect(() => {
        const fetchTransactions = async () => {
            try {
                const response = await fetch('/api/transactions');
                if (!response.ok) {
                    throw new Error('Failed to fetch transactions');
                }
                const data: Transaction[] = await response.json();
                setTransactions(data);
            } catch (err) {
                setError(err.message);
            } finally {
                setLoading(false);
            }
        };

        fetchTransactions();
    }, []);

    const addTransaction = async (transaction: Transaction) => {
        try {
            const response = await fetch('/api/transactions', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(transaction),
            });
            if (!response.ok) {
                throw new Error('Failed to add transaction');
            }
            const newTransaction: Transaction = await response.json();
            setTransactions((prev) => [...prev, newTransaction]);
        } catch (err) {
            setError(err.message);
        }
    };

    return { transactions, loading, error, addTransaction };
};

export default useTransactions;