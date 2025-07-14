import { LucideIcon } from 'lucide-react';
import type { Config } from 'ziggy-js';

export interface Auth {
    user: User;
    roles: Role[];
}

export interface Role {
    id: number;
    name: string;
}


export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavGroup {
    title: string;
    items: NavItem[];
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon | null;
    isActive?: boolean;
}

export interface SharedData {
    name: string;
    phone: string;
    quote: { message: string; author: string };
    auth: Auth;
    ziggy: Config & { location: string };
    sidebarOpen: boolean;

    [key: string]: unknown;
}

export interface SearchData {
    search?: string;
    per_page?: number;
    page?: number;
    total?: number;
    worker_id?: number;
    branch_id?: number;
    firm_id?: number;
    from?: string;
    to?: string;
    month?: string;
    date?: string;
    daysInMonth?: number;

    [key: string]: string | number; // Allow dynamic keys
}

export interface FirmPaginate {
    data: [
        Firm
    ];
    search: string;
    per_page: number;
    from: number;
    to: number;
    total: number;
    current_page: number;
    links: [Link];
}

export interface SalaryPaymentPaginate {
    data: [
        SalaryPayment
    ];
    search: string;
    per_page: number;
    from: number;
    to: number;
    total: number;
    current_page: number;
    links: [Link];
}

export interface AttendancePaginate {
    data: [
        Attendance
    ];
    search: string;
    per_page: number;
    from: number;
    to: number;
    total: number;
    current_page: number;
    links: [Link];
}

export interface Attendance {
    id: number;
    worker: string;
    branch: string;
    work_time: string;
    firm: string;
    from: string;
    to: string;
    worked_minutes: number;
    break_minutes: number;
    late_minutes: number;
    status: string;

    [key: string]: unknown;
}

export interface Report {
    id: number;
    working_days: number;
    worked_days: number;
    worked_minutes: number;
    break_minutes: number;
    late_minutes: number;
    late_days: number;
    last_salary_date?: number;
    from?: '';
    to?: '';
    hour_price?: number;
}


export interface HikvisionAccessEventPaginate {
    data: [
        HikvisionAccessEvent
    ];
    search: string;
    per_page: number;
    from: number;
    to: number;
    total: number;
    current_page: number;
    links: [Link];
}

export interface Link {
    active: string;
    label: string;
    url: string;
}

export interface Firm {
    id: number;
    name: string;
    address: string;
    comment?: string;
    branch_limit: string;
    branch_price: string;
    valid_date: string;
    status: number;
    created_at?: string;
    updated_at?: string;
    branches?: Branch[];
    firm_holidays?: FirmHoliday[];
    firm_setting?: FirmSetting;
    firm_payment?: FirmPayment[];
    user_firms?: UserFirm[];
    workers_count?: number;

    [key: string]: unknown;
}

export interface FirmHoliday {
    id: number;
    firm_id: number;
    name: string;
    date: string;
    comment?: string;
}

export interface FirmSetting {
    id: number;
    firm_id: number;
    webhook_url: string;
}

export interface FirmPayment {
    id: number;
    user_id: number;
    user?: User;
    firm_id: number;
    firm?: Firm;
    amount: number;
    date: string;
    valid_date: string;
    comment?: string;
}


export interface UserPaginate {
    data: [
        User
    ];
    search: string;
    per_page: number;
    from: number;
    to: number;
    total: number;
    current_page: number;
    links: [Link];
}

export interface User {
    id: number;
    name: string;
    email: string;
    phone: string;
    address: string;
    comment?: string;
    password: string;
    balance: number;
    avatar: string;
    email_verified_at: string | null;
    user_topups?: UserTopUp[];
    user_firms?: UserFirm[];
    roles?: Role[];

    [key: string]: unknown;
}

export interface Role {
    id: number;
    name: string;
    guard_name: string;
    created_at: string;
    updated_at: string;
}

export interface UserTopUp {
    id: number;
    user_id: number;
    user?: User;
    client_id: string;
    client?: User;
    amount: number;
    transaction_id: string;
}

export interface UserFirm {
    id: number;
    user_id: number;
    user?: User;
    firm_id: number;
    firm?: Firm;
}


export interface Branch {
    id: number;
    firm_id: number;
    firm?: Firm;
    name: string;
    address: string;
    comment: string;
    work_time: string;
    hour_price: number;
    status: number;
    branch_days?: BranchDay[];
    branch_devices?: BranchDevice[];
    branch_holidays?: BranchHoliday[];
    workers?: Worker[];
    workers_count?: number;
}

export interface BranchHoliday {
    id: number;
    branch_id: number;
    name: string;
    date: string;
    comment?: string;
}

export interface BranchDevice {
    id: number;
    branch_id: number;
    branch?: Branch;
    mac_address: string;
}

export interface BranchDay {
    id: number;
    branch_id: number;
    day_id: number;
    day?: Day;
}

export interface Day {
    id: number;
    name: string;
    name_ru: string;
    name_en: string;
    index: number;
}

export interface WorkerPaginate {
    data: [
        Worker
    ];
    search: string;
    per_page: number;
    from: number;
    to: number;
    total: number;
    current_page: number;
    links: [Link];
}

export interface Worker {
    id: number;
    branch_id: number;
    branch?: Branch;
    name: string;
    phone: string;
    address: string;
    comment?: string;
    employeeNoString: string;
    salaries?: Salary[];
    worker_holidays?: WorkerHoliday[];
    salary_payments?: SalaryPayment[];
    hikvision_access_events?: HikvisionAccessEvent[];
    status?: number;
    balance?: number;
    worked_minutes?: number;
    break_minutes?: number;
    late_minutes?: number;
    worked_days?: number;
    late_days?: number;
    work_days?: number;
}

export interface WorkerHistory {
    id: number;
    amount: number;
    comment: string;
    user_name: string;
    created_at: string;
    worker_id: number;
    salary_id?: number;
    salary_payment_id?: string;
    balance?: string;
}

export interface WorkerHoliday {
    id: number;
    user_id: number;
    user: User;
    worker_id: number;
    wotker?: Worker;
    from: string;
    to: string;
    comment?: string;
}

export interface SalaryPayment {
    id: number;
    user_id: number;
    user?: User;
    worker_id: number;
    worker?: Worker;
    amount: number;
    comment?: string;
    created_at: string;
    updated_at: string;
}

export interface Salary {
    id: number;
    user_id: number;
    user?: User;
    worker_id: number;
    worker?: Worker;
    amount: number;
    worked_minute: number;
    break_minute: number;
    hour_price: number;
    from: string;
    to: string;
    salary_firm_holidays?: SalaryFirmHoliday[];
    salary_branch_holidays?: SalaryBranchHoliday[];
    salary_branch_days?: SalaryBranchDay[];
    comment?: string;
    created_at: string;
    updated_at: string;
}


export interface SalaryPaginate {
    data: [
        Salary
    ];
    search: string;
    per_page: number;
    from: number;
    to: number;
    total: number;
    current_page: number;
    links: [Link];
}


export interface SalaryFirmHoliday {
    id: number;
    salary_id: number;
    name: string;
    date: string;
    comment?: string;
}

export interface SalaryBranchHoliday {
    id: number;
    salary_id: number;
    name: string;
    date: string;
    comment?: string;
}

export interface SalaryBranchDay {
    id: number;
    salary_id: number;
    day_id: number;
    days?: Day[];
}


export interface HikvisionAccess {
    id: number;
    ipAddress: string;
    portNo: number;
    protocol: string;
    macAddress: string;
    channelID: number;
    dateTime: string; // timestamp
    activePostCount: number;
    eventType: string;
    eventState: string;
    eventDescription: string;
    shortSerialNumber: string;
}

export interface HikvisionAccessEvent {
    id: number;
    hikvision_access_id: number;
    hikvision_access?: HikvisionAccess;
    deviceName: string;
    majorEventType: number;
    subEventType: number;
    name: string;
    cardReaderNo: number;
    employeeNoString: string;
    serialNo: number;
    userType: string;
    currentVerifyMode: string;
    frontSerialNo: number;
    attendanceStatus: string;
    label: string;
    mask: string;
    picturesNumber: number;
    purePwdVerifyEnable: boolean;
    picture: string;
    faceReact?: FaceReact;
    work_time: string;
    created_at: string;
    updated_at: string;
}


export interface FaceReact {
    id: number;
    height: number;
    width: number;
    x: number;
    y: number;
}


export interface Stats {
    all_worker: number;
    absent: number;
    on_holiday: number;
    on_time: number;
    late: number;
    gone: number;
}


export interface DailyStats {
    worked_date: string;
    worked_hours: string;
    break_hours: string;
    late_hours: string;
}















