import { createI18n } from 'vue-i18n';

// Import các file ngôn ngữ
import en from './locales/en.json';
import vi from './locales/vi.json';
import ko from './locales/ko.json';

// Hàm để lấy giá trị cookie
function getCookie(name) {
    if (typeof document === 'undefined') return null;
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
    return null;
}

// Ưu tiên lấy từ cookie (hoạt động với SSR), sau đó mới dùng localStorage
const getUserLocale = () => {
    // Kiểm tra môi trường
    if (typeof window === 'undefined') {
        return 'vi'; // Giá trị mặc định cho SSR
    }

    // Ưu tiên lấy từ cookie
    const cookieLocale = getCookie('user-locale');
    if (cookieLocale) {
        return cookieLocale;
    }

    // Nếu không có cookie, thử lấy từ localStorage
    const localStorageLocale = localStorage.getItem('user-locale');
    return localStorageLocale || 'vi';
};

// Tạo cấu hình i18n
const i18n = createI18n({
    legacy: false, // Sử dụng Composition API
    locale: getUserLocale(), // Sử dụng ngôn ngữ đã lưu hoặc mặc định
    fallbackLocale: 'en', // Sử dụng tiếng Anh nếu không có bản dịch
    messages: {
        en,
        vi,
        ko,
    },
});

export default i18n;
