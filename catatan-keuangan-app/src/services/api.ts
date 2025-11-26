import axios from 'axios';

const API_URL = 'https://api.example.com'; // Ganti dengan URL API yang sesuai

export const fetchTransactions = async () => {
    try {
        const response = await axios.get(`${API_URL}/transactions`);
        return response.data;
    } catch (error) {
        throw new Error('Error fetching transactions');
    }
};

export const addTransaction = async (transaction) => {
    try {
        const response = await axios.post(`${API_URL}/transactions`, transaction);
        return response.data;
    } catch (error) {
        throw new Error('Error adding transaction');
    }
};

export const deleteTransaction = async (id) => {
    try {
        await axios.delete(`${API_URL}/transactions/${id}`);
    } catch (error) {
        throw new Error('Error deleting transaction');
    }
};

export const fetchCategories = async () => {
    try {
        const response = await axios.get(`${API_URL}/categories`);
        return response.data;
    } catch (error) {
        throw new Error('Error fetching categories');
    }
};

export const addCategory = async (category) => {
    try {
        const response = await axios.post(`${API_URL}/categories`, category);
        return response.data;
    } catch (error) {
        throw new Error('Error adding category');
    }
};