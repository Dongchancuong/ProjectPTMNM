import React, { useState } from 'react'
import axios from "axios"
import NavBarAdmin from '../../components/sidebar/NavBar'
import TableQLNhanVien from '../../components/table/TableQLNhanVien';

const QLNhanVien = ({ title, type }) => {

    return (
        < div className='qlnhanvien' >
            <NavBarAdmin title={title} />
            <TableQLNhanVien type={type} />
        </div >
    )

}
// const QLNhanVien = ({ title, type }) => {



// };




export default QLNhanVien