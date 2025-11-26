import React from 'react';
import TransactionForm from '../components/TransactionForm';
import TransactionList from '../components/TransactionList';
import { useTransactions } from '../hooks/useTransactions';

const Transactions: React.FC = () => {
    const { transactions } = useTransactions();

    return (
        <div>
            <h1>Catatan Transaksi</h1>
            <TransactionForm />
            <TransactionList transactions={transactions} />
        </div>
    );
};

export default Transactions;