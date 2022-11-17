import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'

const Dashboard = ({ title }) => {
  return (
    <div className='dashboard'>
      <NavBarAdmin title={title} />
      <h1 className='daTitle'>Dashboard</h1>
    </div>
  );
};

export default Dashboard