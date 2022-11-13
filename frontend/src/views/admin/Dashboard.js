import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import DisplayTableFactory from '../../components/table/DisplayTableFactory'

const Dashboard = ({ title }) => {
  // const title = "Dashboard"
  return (
    <div className='dashboard'>
      <NavBarAdmin title={title} />
      <h1 className='daTitle'>Dashboard</h1>
      {/* <DisplayTableFactory /> */}
    </div>
  );
};

export default Dashboard