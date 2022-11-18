import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import TableQLNhanVien from '../../components/table/TableQLNhanVien';

const QLChucVu = ({ title, type }) => {
    return (
        <div className='qlchucvu'>
            <NavBarAdmin title={title} />
            <TableQLNhanVien type={type}/>
        </div>
    );
};

export default QLChucVu