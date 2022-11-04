import React from 'react'
import DisplayTableFactory from '../../components/table/DisplayTableFactory'

const Dashboard = () => {
  return (
    <div className='dashboard'>
      {/* <h1 className='daTitle'>Dashboard</h1> */}
      <DisplayTableFactory />
    </div>
  );
};

export default Dashboard