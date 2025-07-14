import AppLogoIcon from './app-logo-icon';
import { Image } from 'lucide-react';

export default function AppLogo() {
    return (
        <>
            <div
                className="bg-sidebar-primary text-sidebar-primary-foreground flex aspect-square size-8 items-center justify-center rounded-md">
                {/*<AppLogoIcon className="size-5 fill-current text-white dark:text-black" />*/}
                <img
                    src="/images/icons/big-logo-nobg.png"
                    alt="App Logo"
                    className="size-9 fill-current text-white dark:text-black"
                />
            </div>

            <div className="ml-1 grid flex-1 text-left text-sm">
                <span className="mb-0.5 truncate leading-none font-semibold">PayDay</span>
            </div>
        </>
    );
}
