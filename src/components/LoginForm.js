import React from 'react';

const LoginForm = () => {
  return (
    <div className="login-page">
      <iframe
        src="http://ws381219-wad.remote.ac/src/login.php"
        title="Login"
        width="100%"
        height="100%"
        style={{ border: 'none' }}
      ></iframe>
    </div>
  );
};

export default LoginForm;