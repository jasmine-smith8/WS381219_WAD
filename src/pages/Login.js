import React from 'react';

function Login() {

  const onSubmit = async (e) => {
    e.preventDefault();
  };

  return (
    <main id="content">
      <div className="container-fluid">
        <div className="title">
          <h3>Login</h3>
        </div>
        <form onSubmit={onSubmit}>
          <div>
            <label>Email:</label>
            <input
              type="email"
              required
            />
          </div>
          <div>
            <label>Password:</label>
            <input
              type="password"
              required
            />
          </div>
          <button type="submit">Login</button>
        </form>
      </div>
    </main>
  );
}

export default Login;