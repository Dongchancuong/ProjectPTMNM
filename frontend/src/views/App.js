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
import ThongTinTK from './admin/ThongTinTK';
import AuthAPI from './admin/AuthAPI';

function App() {
  const { getToken } = AuthAPI()
  if (!getToken()) {
    return (
      <AuthAdmin />
    )
  }
  return (
    <>
      <SideBar />
      <div className='content-container'>
        <Routes>
          {/* <Route path='/dashboard' element={<Dashboard title={"Dashboard"} />} /> */}
          <Route path='/dangnhap' element={<AuthAdmin />} />
          <Route path='/qlchucvu' element={<QLChucVu title={"Quản lý chức vụ"} type="qlchucvu" />} />
          <Route path='/qlsanpham' element={<QLSanPham title={"Quản lý sản phẩm"} />} />
          <Route path='/qlsanpham/qlloaimay' element={<QLLoaiMay title={"Quản lý loại máy"} />} />
          <Route path='/qlsanpham/qlmausac' element={<QLMauSac title={"Quản lý màu sắc"} />} />
          <Route path='/qlsanpham/qlchatlieu' element={<QLChatLieu title={"Quản lý chất lượng"} />} />
          <Route path='/qlsanpham/qlthuonghieu' element={<QLThuongHieu title={"Quản lý thương hiệu"} />} />
          <Route path='/qltaikhoan' element={<QLTaiKhoan title={"Quản lý tài khoản"} type="qltaikhoan" />} />
          <Route path='/qlnhanvien' element={<QLNhanVien title={"Quản lý nhân viên"} type="qlnhanvien" />} />
          <Route path='/qlkhachhang' element={<QLKhachHang title={"Quản lý khách hàng"} type="qlkhachhang" />} />
          <Route path='/qlhoadon' element={<QLHoaDon title={"Quản lý hóa đơn"} type="qlhoadon" />} />
          <Route path='/qlphieunhaphang' element={<QLPhieuNhapHang title={"Quản lý phiếu nhập hàng"} />} />
          <Route path='/qlchuongtrinhkhuyenmai' element={<QLCTKhuyenMai title={"Quản lý chương trình khuyến mãi"} type="qlctkm"/>} />
          <Route path='/qlnhacungcap' element={<QLNhaCungCap title={"Quản lý nhà cung cấp"} />} />
          <Route path='/thongtintaikhoan' element={<ThongTinTK />} />
          {/* <Route path='/AuthCustomer' element={<AuthCustomer />} /> */}
        </Routes>
      </div >
    </>
  )
}

export default App;
