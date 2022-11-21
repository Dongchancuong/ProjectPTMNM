import React, { useState } from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'
import Table from '../../components/table/Table';

const QLNhanVien = ({ title, type }) => {

    return (
        < div className='qlnhanvien' >
            <NavBarAdmin title={title} />
            <Table type={type} />
        </div >
    )

}

export default QLNhanVien