import React from 'react';
import { Bar } from 'react-chartjs-2';
import { useTransactions } from '../hooks/useTransactions';

const Chart: React.FC = () => {
    const { transactions } = useTransactions();

    const chartData = {
        labels: transactions.map(transaction => transaction.category),
        datasets: [
            {
                label: 'Total Transactions',
                data: transactions.map(transaction => transaction.amount),
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
            },
        ],
    };

    const options = {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    };

    return (
        <div>
            <h2>Financial Overview</h2>
            <Bar data={chartData} options={options} />
        </div>
    );
};

export default Chart;