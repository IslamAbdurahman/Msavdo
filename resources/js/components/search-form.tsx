import React, { useEffect } from 'react';
import { Branch, Firm, SearchData, Worker } from '@/types';
import { Search } from 'lucide-react';
import { useTranslation } from 'react-i18next';
import { format } from 'date-fns';
import DatePicker from 'react-datepicker';

interface SearchFormProps {
    handleSubmit: (e: React.FormEvent<HTMLFormElement>) => void;
    setData: <K extends keyof SearchData>(key: K, value: SearchData[K]) => void;
    data: SearchData;
    workers?: Worker[];
    firms?: Firm[];
    branches?: Branch[];
}

const SearchForm = ({ handleSubmit, setData, data, workers, firms, branches }: SearchFormProps) => {

    const { t } = useTranslation(); // Hook to access translations

    const [filteredBranches, setBranches] = React.useState<Branch[] | undefined>(branches);

    const handleSearch = (e: React.ChangeEvent<HTMLInputElement>) => {
        setData('search', e.target.value);
    };

    const handleMonth = (e: React.ChangeEvent<HTMLInputElement>) => {
        setData('month', e.target.value);
    };

    const handlePerPageChange = (e: React.ChangeEvent<HTMLSelectElement>) => {
        setData('per_page', parseInt(e.target.value, 10));  // parse as number
    };

    const handleWorkerChange = (e: React.ChangeEvent<HTMLSelectElement>) => {
        setData('worker_id', parseInt(e.target.value, 10));  // parse as number
    };

    const handleFirmChange = (e: React.ChangeEvent<HTMLSelectElement>) => {
        const firm_id = parseInt(e.target.value, 10);  // parse as number
        setData('firm_id', firm_id);  // parse as number

        if (firm_id) {
            setBranches(branches?.filter(branch => branch.firm_id === firm_id));
        } else {
            setBranches(branches);
        }
    };

    const handleBranchChange = (e: React.ChangeEvent<HTMLSelectElement>) => {
        setData('branch_id', parseInt(e.target.value, 10));  // parse as number
    };

    useEffect(() => {
        if (data.firm_id) {
            setBranches(branches?.filter(branch => branch.firm_id === data.firm_id));
        } else {
            setBranches(branches);
        }
    }, [data, setBranches, branches]);


    return (
        <form onSubmit={handleSubmit}>
            {/*<div className="inline-flex rounded shadow-xs flex-wrap gap-y-1" role="group">*/}
            <div
                className="flex flex-col lg:gap-0 gap-2 sm:gap-2 lg:flex-row lg:inline-flex lg:flex-wrap lg:gap-y-1 rounded shadow-xs"
                role="group">

                {/* Search Bar */}
                <input
                    type="text"
                    value={data.search}
                    onChange={handleSearch}
                    className="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200
                    rounded
                    hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700
                    focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700
                    dark:text-white dark:hover:text-white
                    dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                    placeholder={t('search')}
                />

                {typeof data.total === 'number' &&
                    <select
                        value={data.per_page}
                        onChange={handlePerPageChange}
                        className="px-4 py-2 text-sm font-medium text-gray-900 bg-white border rounded border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">

                        <option value={10}>10</option>
                        <option value={25}>25</option>
                        <option value={50}>50</option>
                        <option value={data.total}>{t('pagination_optionAll')}</option>
                    </select>
                }

                <div className={'flex-column justify-between items-center'}>
                    {typeof data.from === 'string' &&
                        <DatePicker
                            id="from-date"
                            placeholderText={t('from')}
                            value={data.from}
                            onChange={(from) => {
                                setData('from', from ? format(from, 'yyyy-MM-dd') : '');
                            }}
                            className="px-4 py-2 text-sm font-medium text-gray-900 bg-white
                        border rounded border-gray-200 hover:bg-gray-100 hover:text-blue-700
                        focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700
                        dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700
                        dark:focus:ring-blue-500 dark:focus:text-white"
                        />
                    }

                    {typeof data.to === 'string' &&
                        <DatePicker
                            id="to-date"
                            placeholderText={t('to')}
                            value={data.to}
                            onChange={(to) => {
                                setData('to', to ? format(to, 'yyyy-MM-dd') : '');
                            }}
                            className="px-4 py-2 text-sm font-medium text-gray-900 bg-white  border rounded  border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                        />
                    }
                </div>



                {typeof data.month === 'string' &&
                    <input
                        type="month"
                        value={data.month}
                        max={format(new Date(), 'yyyy-MM')}
                        onChange={handleMonth}
                        className="px-4 py-2 text-sm font-medium text-gray-900 bg-white  border rounded  border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                        placeholder={t('month')}
                    />
                }

                {typeof data.date === 'string' &&
                    <DatePicker
                        id="date"
                        placeholderText={t('date')}
                        value={data.date}
                        onChange={(date) => {
                            setData('date', date ? format(date, 'yyyy-MM-dd') : '');
                        }}
                        className="px-4 py-2 text-sm font-medium text-gray-900 bg-white  border rounded  border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                    />
                }


                {firms &&
                    <select
                        value={data.firm_id || ''}
                        onChange={handleFirmChange}
                        className="px-4 py-2 text-sm font-medium text-gray-900 bg-white  border rounded  border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                    >
                        <option value="0">{t('firm')}</option>
                        {firms.map((firm) => (
                            <option key={firm.id} value={firm.id}>
                                {firm.name}
                            </option>
                        ))}
                    </select>
                }

                {filteredBranches &&
                    <select
                        value={data.branch_id || ''}
                        onChange={handleBranchChange}
                        className="px-4 py-2 text-sm font-medium text-gray-900 bg-white  border rounded  border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                    >
                        <option value="0">{t('branch')}</option>
                        {filteredBranches.map((branch) => (
                            <option key={branch.id} value={branch.id}>
                                {branch.name}
                            </option>
                        ))}
                    </select>
                }

                {workers &&
                    <select
                        value={data.worker_id || ''}
                        onChange={handleWorkerChange}
                        className="px-4 py-2 text-sm font-medium text-gray-900 bg-white  border rounded  border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                    >
                        <option value="">{t('worker')}</option>
                        {workers.map((worker) => (
                            <option key={worker.id} value={worker.id}>
                                {worker.name}
                            </option>
                        ))}
                    </select>
                }


                {/* Submit button to apply filter */}
                <button
                    type="submit"
                    className="flex items-center justify-center gap-2 bg-blue-700 hover:bg-blue-800 focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 px-4 py-2 text-sm font-medium text-gray-900 border border-gray-200 rounded hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-700 dark:text-white dark:hover:text-white dark:focus:text-white"
                >
                    <Search className="text-white dark:text-white" size={20} />
                    <span className="lg:hidden">{t('search')}</span>
                </button>

            </div>
        </form>

    );
};

export default SearchForm;
