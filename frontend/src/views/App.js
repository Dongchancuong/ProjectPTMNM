import './App.scss';
import 'bootstrap/dist/css/bootstrap.min.css';
import SideBar from '../components/sidebar/SideBar';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Dashboard from './admin/Dashboard';
import AuthAdmin from '../views/admin/Auth'
import AuthCustomer from '../views/customer/Auth'
import QLChucVu from './admin/QLChucVu';
import { QLSanPham, QLLoaiMay, QLMauSac, QLChatLieu, QLThuongHieu } from './admin/QLSanPham';
import QLTaiKhoan from './admin/QLTaiKhoan';
import QLNhanVien from './admin/QLNhanVien';
import QLKhachHang from './admin/QLKhachHang';
import QLHoaDon from './admin/QLHoaDon';
import QLPhieuNhapHang from './admin/QLPhieuNhapHang';
import QLCTKhuyenMai from './admin/QLCTKhuyenMai';
import QLNhaCungCap from './admin/QLNhaCungCap';
import { useState } from 'react';

function App() {
  const [dangnhap, setDangnhap] = useState(false)
  const title = "monkey"
  if (!dangnhap) {
    return (
      <Router>
        <Routes>
          <Route exact path='/' element={<AuthAdmin setDangnhap={setDangnhap} />} />
          <Route exact path='/AuthCustomer' element={<AuthCustomer />} />
        </Routes>
      </Router>
    )
  }
  else
    return (
      <Router>
        <SideBar />
        <div className='content-container'>
          <Routes>
            <Route exact path='/' element={<Dashboard title={"Dashboard"} />} />
            <Route exact path='/qlchucvu' element={<QLChucVu title={"Quản lý chức vụ"} type="qlchucvu" />} />
            <Route exact path='/qlsanpham' element={<QLSanPham title={"Quản lý sản phẩm"} />} />
            <Route exact path='/qlsanpham/qlloaimay' element={<QLLoaiMay title={"Quản lý loại máy"} />} />
            <Route exact path='/qlsanpham/qlmausac' element={<QLMauSac title={"Quản lý màu sắc"} />} />
            <Route exact path='/qlsanpham/qlchatlieu' element={<QLChatLieu title={"Quản lý chất lượng"} />} />
            <Route exact path='/qlsanpham/qlthuonghieu' element={<QLThuongHieu title={"Quản lý thương hiệu"} />} />
            <Route exact path='/qltaikhoan' element={<QLTaiKhoan title={"Quản lý tài khoản"} type="qltaikhoan" />} />
            <Route exact path='/qlnhanvien' element={<QLNhanVien title={"Quản lý nhân viên"} type="qlnhanvien" />} />
            <Route exact path='/qlkhachhang' element={<QLKhachHang title={"Quản lý khách hàng"} type="qlkhachhang" />} />
            <Route exact path='/qlhoadon' element={<QLHoaDon title={"Quản lý hóa đơn"} type="qlhoadon" />} />
            <Route exact path='/qlphieunhaphang' element={<QLPhieuNhapHang title={"Quản lý phiếu nhập hàng"} />} />
            <Route exact path='/qlchuongtrinhkhuyenmai' element={<QLCTKhuyenMai title={"Quản lý chương trình khuyến mãi"} />} />
            <Route exact path='/qlnhacungcap' element={<QLNhaCungCap title={"Quản lý nhà cung cấp"} />} />
            <Route exact path='/AuthCustomer' element={<AuthCustomer />} />
          </Routes>
        </div >
      </Router>
    );
}

export default App;
