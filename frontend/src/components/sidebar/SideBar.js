import React, { useState } from 'react';
import styled from 'styled-components'
import { Link } from 'react-router-dom'
import * as FaIcons from 'react-icons/fa';
import * as AiIcons from 'react-icons/ai';
import { SideBarData } from './SideBarData';
import SubMenu from './SubMenu';

//cai dau X
const NavIcon = styled(Link)`
    margin-left: 1rem;
    font-size: 1.5rem;
    height: 60px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    color: white;
`;

//Chieu rong sidebar la 265px
const SidebarNav = styled.nav`
    background: #1e293b;
    // width: ${({ sidebar }) => (sidebar ? '285px' : '70px')};
    width: 285px;
    height: 100vh;  
    display: flex;
    justify-content: center;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1;
`

const Line = styled.hr`
    border-color: white;
    margin: 0;
    // border: 3px;
`

const SidebarWrap = styled.nav`
    width: 100%;
`

const SideBar = () => {
    const [sidebar, setSidebar] = useState(true)

    // const showSidebar = () => setSidebar(!sidebar)

    return (
        <>
            {/*<IconContext.Provider value={{ color: '#fff' }}> */}
            <SidebarNav sidebar={sidebar}>
                <SidebarWrap>
                    <NavIcon to='#'>
                        {/* {sidebar ? <AiIcons.AiOutlineClose onClick={showSidebar} /> : <FaIcons.FaBars onClick={showSidebar} />} */}
                    </NavIcon>
                    <Line />
                    {SideBarData.map((item, index) => {
                        if (item.isActive)
                            return <SubMenu item={item} key={index} />;
                    })}
                </SidebarWrap>
            </SidebarNav>
            {/*</IconContext.Provider> */}
        </>
    );
};

export default SideBar;


