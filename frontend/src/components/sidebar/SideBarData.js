import React from "react";
import * as MdIcons from 'react-icons/md';
import * as AiIcons from 'react-icons/ai';
import * as BsIcons from 'react-icons/bs';
import * as RiIcons from 'react-icons/ri';
import * as IoIcons from 'react-icons/io5';
import * as SiIcons from 'react-icons/si';
import * as TbIcons from 'react-icons/tb';
import * as GrIcons from 'react-icons/gr';
import * as HiIcons from 'react-icons/hi';


export const SideBarData = [
    {
        title: 'Dashboard',
        path: '/',
        icon: <AiIcons.AiFillDashboard/>,
        color: '#cf2931',
        isActive: true
    },
    {
        title: 'Chức vụ',
        path: '/qlchucvu',
        icon: <HiIcons.HiOfficeBuilding/>,
        color: '#18ab39',
        isActive: true
    },
    {
        title: 'Sản phẩm',
        path: '/qlsanpham',
        icon: <BsIcons.BsWatch/>,
        color: '#c1c714',
        isActive: true,
        iconClosed: <RiIcons.RiArrowDownSFill/>,
        iconOpened: <RiIcons.RiArrowUpSFill/>,
        subNav: [
            {
                title: 'Loại máy',
                path: '/qlsanpham/qlloaimay',
                icon: <GrIcons.GrStackOverflow/>,
                color: '#19bd99',
                isActive: true
            },
            {
                title: 'Màu sắc',
                path: '/qlsanpham/qlmausac',
                icon: <IoIcons.IoColorPalette/>,
                color: '#cc185a',
                isActive: true
            },
            {
                title: 'Chất liệu',
                path: '/qlsanpham/qlchatlieu',
                icon: <SiIcons.SiMaterialdesignicons/>,
                color: '#0e49c9',
                isActive: true
            },
            {
                title: 'Thương hiệu',
                path: '/qlsanpham/qlthuonghieu',
                icon: <AiIcons.AiFillTrademarkCircle/>,
                color: '#73c706',
                isActive: true
            }
        ]
    },
    {
        title: 'Tài khoản',
        path: '/qltaikhoan',
        icon: <MdIcons.MdAccountBox/>,
        color: '#bf08a4',
        isActive: true
    },
    {
        title: 'Nhân viên',
        path: '/qlnhanvien',
        icon: <MdIcons.MdSwitchAccount/>,
        color: '#13d493',
        isActive: true
    },
    {
        title: 'Khách hàng',
        path: '/qlkhachhang',
        icon: <RiIcons.RiAccountCircleFill/>,
        color: '#45c910',
        isActive: true
    },
    {
        title: 'Hóa đơn',
        path: '/qlhoadon',
        icon: <RiIcons.RiBillFill/>,
        color: '#d46108',
        isActive: true
    },
    {
        title: 'Phiếu đặt hàng',
        path: '/qlphieudathang',
        icon: <AiIcons.AiFillFileText/>,
        color: '#1385d6',
        isActive: true
    },
    {
        title: 'Phiếu nhập hàng',
        path: '/qlphieunhaphang',
        icon: <AiIcons.AiFillCopy/>,
        color: '#08c27a',
        isActive: true
    },
    {
        title: 'Chương trình khuyến mãi',
        path: '/qlchuongtrinhkhuyenmai',
        icon: <TbIcons.TbDiscount2/>,
        color: '#ce0ddb',
        isActive: true
    },
    {
        title: 'Nhà cung cấp',
        path: '/qlnhacungcap',
        icon: <AiIcons.AiFillReconciliation/>,
        color: '#de1d5d',
        isActive: true
    }
]