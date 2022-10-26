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
        icon: <AiIcons.AiOutlineDashboard/>
    },
    {
        title: 'Chức vụ',
        path: '/qlchucvu',
        icon: <HiIcons.HiOfficeBuilding/>,
        iconClosed: <RiIcons.RiArrowDownSFill/>,
        iconOpened: <RiIcons.RiArrowUpSFill/>,
        subNav: [
            {
                title: 'Nhóm quyền',
                path: '/qlchucvu/qlnhomquyen',
                icon: <AiIcons.AiFillSwitcher/>
            }
        ]
    },
    {
        title: 'Sản phẩm',
        path: '/qlsanpham',
        icon: <BsIcons.BsWatch/>,
        iconClosed: <RiIcons.RiArrowDownSFill/>,
        iconOpened: <RiIcons.RiArrowUpSFill/>,
        subNav: [
            {
                title: 'Loại máy',
                path: '/qlsanpham/qlloaimay',
                icon: <GrIcons.GrStackOverflow/>
            },
            {
                title: 'Màu sắc',
                path: '/qlsanpham/qlmausac',
                icon: <IoIcons.IoColorPalette/>
            },
            {
                title: 'Chất liệu',
                path: '/qlsanpham/qlchatlieu',
                icon: <SiIcons.SiMaterialdesignicons/>
            },
            {
                title: 'Thương hiệu',
                path: '/qlsanpham/qlthuonghieu',
                icon: <AiIcons.AiFillTrademarkCircle/>
            }
        ]
    },
    {
        title: 'Tài khoản',
        path: '/qltaikhoan',
        icon: <MdIcons.MdAccountBox/>
    },
    {
        title: 'Nhân viên',
        path: '/qlnhanvien',
        icon: <MdIcons.MdSwitchAccount/>
    },
    {
        title: 'Khách hàng',
        path: '/qlkhachhang',
        icon: <RiIcons.RiAccountCircleFill/>
    },
    {
        title: 'Hóa đơn',
        path: '/qlhoadon',
        icon: <RiIcons.RiBillFill/>
    },
    {
        title: 'Phiếu đặt hàng',
        path: '/qlphieudathang',
        icon: <AiIcons.AiFillFileText/>
    },
    {
        title: 'Phiếu nhập hàng',
        path: '/qlphieunhaphang',
        icon: <AiIcons.AiFillCopy/>
    },
    {
        title: 'Chương trình khuyến mãi',
        path: '/qlchuongtrinhkhuyenmai',
        icon: <TbIcons.TbDiscount2/>
    },
    {
        title: 'Nhà cung cấp',
        path: '/qlnhacungcap',
        icon: <AiIcons.AiFillReconciliation/>
    }
]