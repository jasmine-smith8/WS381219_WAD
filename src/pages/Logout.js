const handleLogout = () => {
    localStorage.removeItem("user");
    window.location.reload(); 
};
