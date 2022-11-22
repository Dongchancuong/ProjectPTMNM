import React, { useEffect, useState } from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import AuthAPI from './AuthAPI';

const Dashboard = ({ title }) => {
  const { user, http } = AuthAPI()
  const [userdetail, setUserdetail] = useState()

  useEffect(() => {
    fetchUserDetail()
  }, [])

  const fetchUserDetail = () => {
    http.post('/me').then((res) => {
      setUserdetail(res.data)
    })
  }

  return (
    <div className='dashboard'>
      <NavBarAdmin title={title} />
      <h1 className='daTitle'>Dashboard</h1>
    </div>
  );
};

export default Dashboard