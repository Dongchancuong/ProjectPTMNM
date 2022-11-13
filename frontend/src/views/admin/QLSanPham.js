import React from 'react'
import NavBarAdmin from '../../components/sidebar/NavBar'

export const QLSanPham = ({ title }) => {
    return (
        <div className='qlsanpham'>
            <NavBarAdmin title={title} />
            <h1 className='daTitle'>Quản lý sản phẩm</h1>
        </div>
    )
}

export const QLLoaiMay = ({ title }) => {
    return (
        <div className='qlsanpham'>
            <NavBarAdmin title={title} />
            <h1 className='daTitle'>Quản lý loại máy</h1>
        </div>
    )
}

export const QLMauSac = ({ title }) => {
    return (
        <div className='qlsanpham'>
            <NavBarAdmin title={title} />
            <h1 className='daTitle'>Quản lý màu sắc</h1>
        </div>
    )
}

export const QLChatLieu = ({ title }) => {
    return (
        <div className='qlsanpham'>
            <NavBarAdmin title={title} />
            <h1 className='daTitle'>Quản lý chất liệu</h1>
        </div>
    )
}

export const QLThuongHieu = ({ title }) => {
    return (
        <div className='qlsanpham'>
            <NavBarAdmin title={title} />
            <h1 className='daTitle'>Quản lý thương hiệu</h1>
        </div>
    )
}