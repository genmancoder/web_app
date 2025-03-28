import { useState } from 'react';
import './Counter.css';

function Counter() {
    const [count, setCount] = useState(0);

    function handleIncrement() {
        setCount((prev) => prev + 1);
    }

    function handleDecrement() {
        setCount((prev) => prev - 1);
    }

    return (
        <div className="counter-container">
            <h2>Counter</h2>
            <div className="count-display">{count}</div>
            <div className="button-group">
                <button onClick={handleIncrement}>➕ Increment</button>
                <button onClick={handleDecrement}>➖ Decrement</button>
            </div>
        </div>
    );
}

export default Counter;
