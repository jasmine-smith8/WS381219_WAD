import React, { useState, useEffect } from 'react';

const BrowseCourses = () => {
    const [courses, setCourses] = useState([]);
    const [searchTerm, setSearchTerm] = useState('');

    useEffect(() => {
        // Fetch courses from an API or a static list
        const fetchCourses = async () => {
            // Replace with your API endpoint or data fetching logic
            const response = await fetch('/api/courses');
            const data = await response.json();
            setCourses(data);
        };

        fetchCourses();
    }, []);

    const handleSearch = (event) => {
        setSearchTerm(event.target.value);
    };

    const filteredCourses = courses.filter(course =>
        course.title.toLowerCase().includes(searchTerm.toLowerCase())
    );

    return (
        <div>
            <h1>Browse Courses</h1>
            <input
                type="text"
                placeholder="Search courses..."
                value={searchTerm}
                onChange={handleSearch}
            />
            <ul>
                {filteredCourses.map(course => (
                    <li key={course.id}>
                        <h2>{course.title}</h2>
                        <p>{course.description}</p>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default BrowseCourses;