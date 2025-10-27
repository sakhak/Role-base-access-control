// import React from "react";
import { Layout, Menu, Typography } from "antd";
import {
    PieChartOutlined,
    UserOutlined,
    TeamOutlined,
    BookOutlined,
    ScheduleOutlined,
    FileTextOutlined,
    DollarOutlined,
    // SettingOutlined,
} from "@ant-design/icons";
import { Link } from "react-router-dom";

const { Sider } = Layout;
const { Title } = Typography;

function Sidebar({ role }) {
    const items = [
        {
            key: "dashboard",
            icon: <PieChartOutlined />,
            label: (
                <Link
                    to={
                        role === "super_admin"
                            ? "/admin"
                            : "/client"
                    }
                >
                    Dashboard
                </Link>
            ),
        },
        {
            key: "students",
            icon: <TeamOutlined />,
            label: "Students",
            children: [
                {
                    key: "all-students",
                    label: <Link to="/students">All Students</Link>,
                },
                {
                    key: "add-student",
                    label: <Link to="/students/add">Add Student</Link>,
                },
            ],
        },
        {
            key: "teachers",
            icon: <UserOutlined />,
            label: "Teachers",
            children: [
                {
                    key: "all-teachers",
                    label: <Link to="/teachers">All Teachers</Link>,
                },
                {
                    key: "add-teacher",
                    label: <Link to="/teachers/add">Add Teacher</Link>,
                },
            ],
        },
        {
            key: "classes",
            icon: <BookOutlined />,
            label: "Classes",
        },
        {
            key: "attendance",
            icon: <ScheduleOutlined />,
            label: "Attendance",
        },
        {
            key: "exams",
            icon: <FileTextOutlined />,
            label: "Exams",
        },
        {
            key: "fees",
            icon: <DollarOutlined />,
            label: "Fees",
        },
    ];

    const filteredItems =
        role === "admin"
            ? items.filter((item) => item.key !== "settings")
            : items;

    return (
        <Sider
            theme="light"
            width={250}
            className="shadow-lg border-r border-gray-200"
        >
            <div className="p-4 h-16 flex items-center justify-center bg-blue-600">
                <Title level={4} className="mb-0 text-white">
                    EduManage Pro
                </Title>
            </div>
            <Menu
                theme="light"
                mode="inline"
                defaultSelectedKeys={["dashboard"]}
                items={filteredItems}
                className="border-0"
            />
        </Sider>
    );
}

export default Sidebar;
