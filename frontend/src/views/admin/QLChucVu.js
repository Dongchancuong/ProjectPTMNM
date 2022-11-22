import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import Table from '../../components/table/Table';
import axios from 'axios';

const QLChucVu = ({ title, type }) => {

    const res = axios.get("http://localhost:8000/api/cv")

    return (
        <div className='qlchucvu'>
            <NavBarAdmin title={title} />
            <Table type={type} listCV={res.data.data}/>
        </div>
    );
};

export default QLChucVu