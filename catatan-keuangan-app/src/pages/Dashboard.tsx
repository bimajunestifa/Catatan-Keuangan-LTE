import React from 'react';
import { Chart } from '../components/Chart';
import { TransactionList } from '../components/TransactionList';
import { useTransactions } from '../hooks/useTransactions';

const Dashboard: React.FC = () => {
    const { transactions } = useTransactions();

    const totalIncome = transactions
        .filter(transaction => transaction.type === 'income')
        .reduce((acc, transaction) => acc + transaction.amount, 0);

    const totalExpense = transactions
        .filter(transaction => transaction.type === 'expense')
        .reduce((acc, transaction) => acc + transaction.amount, 0);

    return (
        <div className="dashboard">
            <h1>Dashboard</h1>
            <div className="summary">
                <h2>Summary</h2>
                <p>Total Income: ${totalIncome}</p>
                <p>Total Expense: ${totalExpense}</p>
                <p>Net Balance: ${totalIncome - totalExpense}</p>
            </div>
            <Chart />
            <TransactionList />
        </div>
    );
};

export default Dashboard;