import React, { useState } from 'react';

const Categories: React.FC = () => {
    const [categories, setCategories] = useState<string[]>([]);
    const [newCategory, setNewCategory] = useState<string>('');

    const handleAddCategory = () => {
        if (newCategory.trim() !== '') {
            setCategories([...categories, newCategory]);
            setNewCategory('');
        }
    };

    const handleDeleteCategory = (categoryToDelete: string) => {
        setCategories(categories.filter(category => category !== categoryToDelete));
    };

    return (
        <div>
            <h1>Manage Categories</h1>
            <input
                type="text"
                value={newCategory}
                onChange={(e) => setNewCategory(e.target.value)}
                placeholder="Add new category"
            />
            <button onClick={handleAddCategory}>Add Category</button>
            <ul>
                {categories.map((category, index) => (
                    <li key={index}>
                        {category}
                        <button onClick={() => handleDeleteCategory(category)}>Delete</button>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Categories;